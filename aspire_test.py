# coding: utf-8

# In[1]:
import os
import sys
os.environ['HADOOP_HOME'] = "/usr/local/hadoop"
os.environ['PYSPARK_PYTHON'] = sys.executable

import logging
s_logger = logging.getLogger('py4j.java_gateway')
s_logger.setLevel(logging.ERROR)

# Import pyspark packages
from pyspark.sql.types import *
from pyspark.sql.functions import *
from pyspark.ml import Pipeline
from pyspark.ml.feature import VectorAssembler, VectorIndexer, StringIndexer, OneHotEncoderEstimator, OneHotEncoder
from pyspark.ml.evaluation import BinaryClassificationEvaluator
from pyspark.mllib.evaluation import MulticlassMetrics
from pyspark.ml.classification import GBTClassificationModel
import json
import base64
# Initialize pyspark session
# from pyspark.context import SparkContext
# from pyspark.sql.session import SparkSession
from pyspark.context import  SparkConf, SparkContext
from pyspark.sql.session import SparkSession
sc = SparkContext('local')

# conf = (SparkConf()
#         .set("spark.debug.maxToStringFields", "140")
#         .set("spark.driver.memory", "15g")
#         .set('spark.executor.memory', '4g')
#         .set('spark.sql.codegen.fallback','true')
#         .set('spark.sql.codegen.wholeStage','false')
#         .set('spark.driver.maxResultSize', '10g'))

# sc.stop()
# sc = SparkContext(conf=conf)
sc.setLogLevel('OFF')
from signal import signal, SIGPIPE, SIG_DFL
signal(SIGPIPE,SIG_DFL)
# sc = SparkContext('local')
spark = SparkSession(sc)
spark.sparkContext._conf.setAll([("spark.debug.maxToStringFields", "140"), ("spark.driver.memory", "15g"), ('spark.executor.cores', '4'), ('spark.cores.max', '4'), ('spark.executor.memory', '4g'),('spark.sql.codegen.fallback','true'),('spark.driver.maxResultSize', '10g')])
# %matplotlib inline
b64test = base64.b64decode(sys.argv[1])
print(b64test.decode())
sys.exit()

# In[2]:


# Define functions
def convert_columns(df, col_int = None, col_dbl = None):
    # Iteratively convert int columns
    if col_int:
        for col_name in col_int: 
            df =  df.withColumn(col_name, df[col_name].cast(IntegerType())).fillna(0)
      
    # Iteratively convert double columns
    if col_dbl:
        for col_name in col_dbl: 
            df =  df.withColumn(col_name, df[col_name].cast(DoubleType())).fillna(0)
      
      # Fill missing values with '0'
    df = df.fillna('0')
    return df

def get_vec_assembler(stages, col_cat = None, col_num = None, col_label = None):
    if col_cat:
        for cat in col_cat:
            # Category Indexing with StringIndexer
            str_idx = StringIndexer(inputCol=cat, outputCol=cat + "Index")
            # Use OneHotEncoder to convert categorical variables into binary SparseVectors
            encoder = OneHotEncoderEstimator(inputCols=[str_idx.getOutputCol()], outputCols=[cat + "classVec"]).setDropLast(False)
            # encoder = OneHotEncoder(inputCol=cat+"Index", outputCol=cat+"classVec").setDropLast(False)
            # Add stages
            stages += [str_idx, encoder]
#             stages += [str_idx]
      
    if col_num:
#     assembler_input = [c + "classVec" for c in col_cat] + col_num
        assembler_input = [c + "Index" for c in col_cat] + col_num
        assembler = VectorAssembler(inputCols=assembler_input, outputCol="features")
        stages += [assembler]  
    
    if col_label:
        str_idx_label = StringIndexer(inputCol=col_label, outputCol="label")
        stages += [str_idx_label]
    
    return stages, assembler_input


def create_pipeline(dataset, stages):
    pipeline = Pipeline(stages=stages)
    pipelineModel = pipeline.fit(dataset)
    return pipelineModel.transform(dataset)


def get_probability_value(probability):
    value = probability[1]
    return float(value)
get_probability_value = udf(get_probability_value, DoubleType())


# In[3]:


# Load pre-trained model

model_gbt_path = '/var/www/aicom2/model/model_gbt'
loaded_model_gbt = GBTClassificationModel.load(model_gbt_path)


# In[4]:


# Load testing data
# application_test = spark.read.csv('/var/www/aicom2/var/application_train_test.csv',inferSchema =True, header = 'True')
#application_test = json.loads(base64.b64decode(sys.argv[1]))

# In[5]:


# Define columns we need
selected_cols = [
 'CODE_GENDER',
 'NAME_INCOME_TYPE',
 'NAME_EDUCATION_TYPE',
 'OCCUPATION_TYPE',
 'HOUSETYPE_MODE',
 'EMERGENCYSTATE_MODE',
 'CNT_CHILDREN',
 'DAYS_BIRTH',
 'DAYS_EMPLOYED',
 'DAYS_ID_PUBLISH',
 'FLAG_EMP_PHONE',
 'FLAG_WORK_PHONE',
 'REGION_RATING_CLIENT',
 'REGION_RATING_CLIENT_W_CITY',
 'REG_CITY_NOT_LIVE_CITY',
 'REG_CITY_NOT_WORK_CITY',
 'LIVE_CITY_NOT_WORK_CITY',
 'AMT_GOODS_PRICE',
 'DAYS_REGISTRATION',
 'EXT_SOURCE_1',
 'EXT_SOURCE_2',
 'EXT_SOURCE_3',
 'APARTMENTS_AVG',
 'YEARS_BEGINEXPLUATATION_AVG',
 'FLOORSMAX_AVG',
 'LIVINGAREA_AVG',
 'YEARS_BEGINEXPLUATATION_MODE',
 'FLOORSMAX_MODE',
 'APARTMENTS_MEDI',
 'YEARS_BEGINEXPLUATATION_MEDI',
 'FLOORSMAX_MEDI',
 'LIVINGAREA_MEDI',
 'TOTALAREA_MODE',
 'DEF_30_CNT_SOCIAL_CIRCLE',
 'DEF_60_CNT_SOCIAL_CIRCLE',
 'DAYS_LAST_PHONE_CHANGE',
 'SK_ID_CURR']#,
#  'TARGET']


# In[6]:


# Convert data to a single string to represent input
sample_json = (application_test.fillna('0')).limit(1).toJSON().collect()
sample_json = sample_json[0]


# In[7]:


# Convert input json string to Dataframe
json_test = spark.read.json(sc.parallelize([sample_json]))
# display(json_test)
# json_test.dtypes


# In[8]:


# Select required columns from the input dataframe 
df_test_selected = json_test.select(selected_cols)

column_string_list = [item[0] for item in df_test_selected.dtypes if item[1].startswith('string')]
column_int_list    = [item[0] for item in df_test_selected.dtypes if item[1].startswith('bigint')]
column_float_list  = [item[0] for item in df_test_selected.dtypes if item[1].startswith('double')]
column_num_list = column_int_list + column_float_list
# display(df_test_selected.columns)


# In[9]:


# Convert number cols and clean
df_test_selected = convert_columns(df_test_selected, col_int = column_int_list, col_dbl = column_float_list)


# In[10]:


# Indexing categorical, numerical features and adding to vector assembler
stages_test = []
stages_test, assembler_train = get_vec_assembler(stages_test, col_cat = column_string_list, col_num = column_num_list)


# In[11]:


# print(stages_test)


# In[12]:


dataset_test = create_pipeline(df_test_selected, stages_test)


# In[13]:


predictions_prob_gbt = loaded_model_gbt.transform(dataset_test).withColumn('prediction_probability', get_probability_value('probability'))


# In[16]:


# predictions_prob_gbt.select('SK_ID_CURR', 'prediction_probability').toPandas()


# In[19]:


predict_json = predictions_prob_gbt.select('SK_ID_CURR', 'prediction_probability').head(1)
# print(json.dumps(predict_json))
# items = []
for row in predict_json:
    items= str('{"id":')+str(row[0])+str(',"probability":')+str(row[1])+str('}')
print(items)

