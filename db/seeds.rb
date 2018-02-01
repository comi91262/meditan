# This file should contain all the record creation needed to seed the database with its default values.
# The data can then be loaded with the rails db:seed command (or created alongside the database with db:setup).
#
# Examples:
#
#   movies = Movie.create([{ name: 'Star Wars' }, { name: 'Lord of the Rings' }])
#   Character.create(name: 'Luke', movie: movies.first)
#
#
#
#

Test.create(name_jp: "空腸", name_en: "jejunum")
Test.create(name_jp: "回腸", name_en: "ileum")
Test.create(name_jp: "盲腸", name_en: "cecum")
Test.create(name_jp: "憩室", name_en: "diverticulum")
Test.create(name_jp: "消化器学", name_en: "gastroenterology")
Test.create(name_jp: "空腸", name_en: "jejunum")
Test.create(name_jp: "回腸", name_en: "ileum")
Test.create(name_jp: "盲腸", name_en: "cecum")
Test.create(name_jp: "憩室", name_en: "diverticulum")
Test.create(name_jp: "消化", name_en: "digestion")
Test.create(name_jp: "無食欲", name_en: "anorexia")
Test.create(name_jp: "嚥下障害", name_en: "dysphagia")
Test.create(name_jp: "胸やけ", name_en: "heartburn")
Test.create(name_jp: "吐血", name_en: "hematemesis")
Test.create(name_jp: "下血", name_en: "melenak")
Test.create(name_jp: "便秘", name_en: "constipation")
Test.create(name_jp: "腹部膨満感", name_en: "bloating")
Test.create(name_jp: "膨隆", name_en: "protrusion")
Test.create(name_jp: "消化不良", name_en: "indigestion")
Test.create(name_jp: "胃食道逆流症", name_en: "gastroesophageal reflux disease")
Test.create(name_jp: "食道静脈瘤", name_en: "esophageal varix")
Test.create(name_jp: "腸重積", name_en: "intussusception")
Test.create(name_jp: "潰瘍性大腸炎", name_en: "ulcerative colitis")
Test.create(name_jp: "汎発性腹膜炎", name_en: "Pan-peritonitis")
Test.create(name_jp: "過敏性腸症候群", name_en: "irritable bowel syndrome")
Test.create(name_jp: "痔核", name_en: "hemorrhoid")
Test.create(name_jp: "総胆管", name_en: "common bile duct")
Test.create(name_jp: "胆嚢管", name_en: "cystic duct")
Test.create(name_jp: "胆汁", name_en: "bile")
Test.create(name_jp: "腹水", name_en: "ascites")
Test.create(name_jp: "黄疸", name_en: "jaundice,icterus")
Test.create(name_jp: "肝性脳症", name_en: "hepatic encephalopathy")
Test.create(name_jp: "胆管炎", name_en: "cholangitis")
Test.create(name_jp: "胆嚢炎", name_en: "cholecystitis")

Question.create(name_jp: "消化器学", name_en: "gastroenterology", genre: "消化器");
Question.create(name_jp: "空腸", name_en: "jejunum", genre: "消化器");
Question.create(name_jp: "回腸", name_en: "ileum", genre: "消化器");
Question.create(name_jp: "盲腸", name_en: "cecum", genre: "消化器");
Question.create(name_jp: "憩室", name_en: "diverticulum", genre: "消化器");
Question.create(name_jp: "消化", name_en: "digestion", genre: "消化器");
Question.create(name_jp: "無食欲", name_en: "anorexia", genre: "消化器");
Question.create(name_jp: "嚥下障害", name_en: "dysphagia", genre: "消化器");
Question.create(name_jp: "胸やけ", name_en: "heartburn", genre: "消化器");
Question.create(name_jp: "吐血", name_en: "hematemesis", genre: "消化器");
Question.create(name_jp: "下血", name_en: "melenak", genre: "消化器");
Question.create(name_jp: "便秘", name_en: "constipation", genre: "消化器");
Question.create(name_jp: "腹部膨満感", name_en: "bloating", genre: "消化器");
Question.create(name_jp: "膨隆", name_en: "protrusion", genre: "消化器");
Question.create(name_jp: "消化不良", name_en: "indigestion", genre: "消化器");
Question.create(name_jp: "胃食道逆流症", name_en: "gastroesophageal reflux disease", genre: "消化器");
Question.create(name_jp: "食道静脈瘤", name_en: "esophageal varix", genre: "消化器");
Question.create(name_jp: "腸重積", name_en: "intussusception", genre: "消化器");
Question.create(name_jp: "潰瘍性大腸炎", name_en: "ulcerative colitis", genre: "消化器");
Question.create(name_jp: "汎発性腹膜炎", name_en: "Pan-peritonitis", genre: "消化器");
Question.create(name_jp: "過敏性腸症候群", name_en: "irritable bowel syndrome", genre: "消化器");
Question.create(name_jp: "痔核", name_en: "hemorrhoid", genre: "消化器");
Question.create(name_jp: "総胆管", name_en: "common bile duct", genre: "消化器");
Question.create(name_jp: "胆嚢管", name_en: "cystic duct", genre: "消化器");
Question.create(name_jp: "胆汁", name_en: "bile", genre: "消化器");
Question.create(name_jp: "腹水", name_en: "ascites", genre: "消化器");
Question.create(name_jp: "黄疸", name_en: "jaundice,icterus", genre: "消化器");
Question.create(name_jp: "肝性脳症", name_en: "hepatic encephalopathy", genre: "消化器");
Question.create(name_jp: "胆管炎 cholangitis", genre: "消化器");
Question.create(name_jp: "胆嚢炎", name_en: "cholecystitis", genre: "消化器");

Question.create(name_jp: "心臓病学", name_en: "cardiology", genre: "循環器");
Question.create(name_jp: "上腕動脈", name_en: "brachial artery", genre: "循環器");
Question.create(name_jp: "大腿動脈", name_en: "femoral artery", genre: "循環器");
Question.create(name_jp: "橈側皮静脈", name_en: "cephalic vein", genre: "循環器");
Question.create(name_jp: "弁膜症", name_en: "valvular heart disease", genre: "循環器");
Question.create(name_jp: "大動脈弁狭窄症", name_en: "aortic stenosis", genre: "循環器");
Question.create(name_jp: "大動脈弁閉鎖不全", name_en: "aortic regurgitation", genre: "循環器");
Question.create(name_jp: "アテローム硬化", name_en: "atherosclerosis", genre: "循環器");
Question.create(name_jp: "動脈硬化", name_en: "arteriosclerosis", genre: "循環器");
Question.create(name_jp: "狭心症", name_en: "angina pectoris", genre: "循環器");
Question.create(name_jp: "心筋症", name_en: "cardiomyopathy", genre: "循環器");
Question.create(name_jp: "動脈瘤", name_en: "aneurysm", genre: "循環器");
Question.create(name_jp: "心内膜炎", name_en: "endocarditis", genre: "循環器");
Question.create(name_jp: "心房細動", name_en: "atrial fibrillation", genre: "循環器");
Question.create(name_jp: "内分泌学", name_en: "endocrinology ・内分泌", genre: "循環器");
Question.create(name_jp: "視床下部", name_en: "hypothalamus", genre: "循環器");
Question.create(name_jp: "下垂体", name_en: "pituitary gland", genre: "循環器");
Question.create(name_jp: "副腎", name_en: "adrenal gland", genre: "循環器");
Question.create(name_jp: "副腎皮質", name_en: "cortex of the adrenal gland", genre: "循環器");
Question.create(name_jp: "副腎髄質", name_en: "medulla of the adrenal gland", genre: "循環器");
Question.create(name_jp: "膵島", name_en: "pancreatic islet", genre: "循環器");
Question.create(name_jp: "外分泌", name_en: "exocrine", genre: "循環器");
Question.create(name_jp: "るいそう", name_en: "emaciation", genre: "循環器");
Question.create(name_jp: "脂質異常症", name_en: "dyslipidemia", genre: "循環器");
Question.create(name_jp: "痛風", name_en: "gout", genre: "循環器");
Question.create(name_jp: "骨粗鬆症", name_en: "osteoporosis", genre: "循環器");
Question.create(name_jp: "先端巨大症", name_en: "acromegaly", genre: "循環器");
Question.create(name_jp: "甲状腺腫", name_en: "goiter", genre: "循環器");
Question.create(name_jp: "輸液・補液", name_en: "infusion", genre: "循環器");

Question.create(name_jp: "泌尿器科学", name_en: "urology", genre: "腎臓");
Question.create(name_jp: "糸球体", name_en: "glomerulus", genre: "腎臓");
Question.create(name_jp: "尿細管", name_en: "renal tubule", genre: "腎臓");
Question.create(name_jp: "ネフローゼ", name_en: "nephrosis", genre: "腎臓");
Question.create(name_jp: "尿毒症", name_en: "uremia", genre: "腎臓");
Question.create(name_jp: "血液透析", name_en: "hemodialysis", genre: "腎臓");
Question.create(name_jp: "腹膜透析", name_en: "peritoneal dialysis", genre: "腎臓");
Question.create(name_jp: "利尿薬", name_en: "diuretic", genre: "腎臓");

Question.create(name_jp: "血液学", name_en: "hematology", genre: "血液");
Question.create(name_jp: "拒絶反応", name_en: "rejection", genre: "血液");
Question.create(name_jp: "自己抗体", name_en: "autoantibody", genre: "血液");
Question.create(name_jp: "免疫寛容", name_en: "immune tolerance", genre: "血液");
Question.create(name_jp: "骨髄", name_en: "bone marrow", genre: "血液");
Question.create(name_jp: "胸腺", name_en: "thymus", genre: "血液");
Question.create(name_jp: "血算", name_en: "complete blood count", genre: "血液");
Question.create(name_jp: "赤血球", name_en: "erythrocyte", genre: "血液");
Question.create(name_jp: "白血球", name_en: "leukocyte", genre: "血液");
Question.create(name_jp: "好酸球", name_en: "eosinophil", genre: "血液");
Question.create(name_jp: "好中球", name_en: "neutrophil", genre: "血液");
Question.create(name_jp: "好塩基球", name_en: "basophil", genre: "血液");
Question.create(name_jp: "血栓", name_en: "thrombus", genre: "血液");
Question.create(name_jp: "塞栓", name_en: "embolus", genre: "血液");
Question.create(name_jp: "脾腫", name_en: "splenomegaly", genre: "血液");
Question.create(name_jp: "貧血", name_en: "anemia", genre: "血液");
Question.create(name_jp: "白血病", name_en: "leukemia", genre: "血液");
Question.create(name_jp: "血友病", name_en: "hemophilia", genre: "血液");
Question.create(name_jp: "血清", name_en: "serum", genre: "血液");
Question.create(name_jp: "血漿", name_en: "plasma", genre: "血液");
Question.create(name_jp: "赤沈", name_en: "erythrocyte sedimentation rate", genre: "血液");
Question.create(name_jp: "輸血", name_en: "blood transfusion", genre: "血液");
Question.create(name_jp: "移植", name_en: "transplantation", genre: "血液");

Question.create(name_jp: "病原体", name_en: "pathogen", genre: "感染症");
Question.create(name_jp: "プリオン", name_en: "prion", genre: "感染症");
Question.create(name_jp: "真菌", name_en: "fungus", genre: "感染症");
Question.create(name_jp: "寄生虫", name_en: "parasite", genre: "感染症");
Question.create(name_jp: "水痘", name_en: "varicella", genre: "感染症");
Question.create(name_jp: "麻疹", name_en: "measles", genre: "感染症");
Question.create(name_jp: "風疹", name_en: "rubella", genre: "感染症");
Question.create(name_jp: "結核", name_en: "tuberculosis", genre: "感染症");
Question.create(name_jp: "百日咳", name_en: "pertussis", genre: "感染症");
Question.create(name_jp: "破傷風", name_en: "tetanus", genre: "感染症");
Question.create(name_jp: "マラリア", name_en: "malaria", genre: "感染症");
Question.create(name_jp: "コレラ", name_en: "cholera", genre: "感染症");
Question.create(name_jp: "赤痢", name_en: "dysentery", genre: "感染症");
Question.create(name_jp: "クラミジア", name_en: "chlamydia", genre: "感染症");
Question.create(name_jp: "髄膜炎", name_en: "meningitis", genre: "感染症");
Question.create(name_jp: "市中肺炎", name_en: "community acquired pneumonia", genre: "感染症");
Question.create(name_jp: "院内感染", name_en: "nosocomial infection", genre: "感染症");
Question.create(name_jp: "グラム染色", name_en: "Gram stain", genre: "感染症");
Question.create(name_jp: "培養", name_en: "culture", genre: "感染症");
Question.create(name_jp: "予防接種", name_en: "vaccination", genre: "感染症");
Question.create(name_jp: "検疫", name_en: "quarantine", genre: "感染症");
Question.create(name_jp: "隔離", name_en: "isolation", genre: "感染症");

Question.create(name_jp: "滅菌", name_en: "sterilization", genre: "呼吸器");
Question.create(name_jp: "気管", name_en: "trachea", genre: "呼吸器");
Question.create(name_jp: "気管支", name_en: "bronchus", genre: "呼吸器");
Question.create(name_jp: "気管分岐部", name_en: "tracheal bifurcation", genre: "呼吸器");
Question.create(name_jp: "縦隔", name_en: "mediastinum", genre: "呼吸器");
Question.create(name_jp: "胸郭", name_en: "thorax", genre: "呼吸器");
Question.create(name_jp: "乳腺", name_en: "mammary gland", genre: "呼吸器");
Question.create(name_jp: "腋窩", name_en: "axilla", genre: "呼吸器");
Question.create(name_jp: "喀痰", name_en: "sputum", genre: "呼吸器");
Question.create(name_jp: "喀血", name_en: "hemoptysis", genre: "呼吸器");
Question.create(name_jp: "嗄声", name_en: "hoarseness", genre: "呼吸器");
Question.create(name_jp: "いびき", name_en: "snoring", genre: "呼吸器");
Question.create(name_jp: "チアノーゼ", name_en: "cyanosis", genre: "呼吸器");
Question.create(name_jp: "呼吸困難", name_en: "dyspnea", genre: "呼吸器");
Question.create(name_jp: "無呼吸", name_en: "apnea", genre: "呼吸器");
Question.create(name_jp: "ばち指", name_en: "clubbing", genre: "呼吸器");
Question.create(name_jp: "無気肺", name_en: "atelectasis", genre: "呼吸器");
Question.create(name_jp: "気管支炎", name_en: "bronchitis", genre: "呼吸器");
Question.create(name_jp: "間質性肺炎", name_en: "interstitial pneumonia", genre: "呼吸器");
Question.create(name_jp: "肺水腫", name_en: "pulmonary edema", genre: "呼吸器");
Question.create(name_jp: "気胸", name_en: "pneumothorax", genre: "呼吸器");
Question.create(name_jp: "睡眠時無呼吸症候群", name_en: "sleep apnea syndrome", genre: "呼吸器");
Question.create(name_jp: "過換気症候群", name_en: "hyperventilation syndrome", genre: "呼吸器");
Question.create(name_jp: "乳腺症", name_en: "mastopathy", genre: "呼吸器");

Question.create(name_jp: "神経内科学", name_en: "neurology", genre: "神経");
Question.create(name_jp: "脳神経外科学", name_en: "neurosurgery", genre: "神経");
Question.create(name_jp: "大脳", name_en: "cerebrum", genre: "神経");
Question.create(name_jp: "前頭葉", name_en: "frontal lobe", genre: "神経");
Question.create(name_jp: "頭頂葉", name_en: "parietal lobe", genre: "神経");
Question.create(name_jp: "側頭葉", name_en: "temporal lobe", genre: "神経");
Question.create(name_jp: "後頭葉", name_en: "occipital lobe", genre: "神経");
Question.create(name_jp: "延髄", name_en: "medulla oblongata", genre: "神経");
Question.create(name_jp: "橋", name_en: "pons", genre: "神経");
Question.create(name_jp: "中脳", name_en: "midbrain", genre: "神経");
Question.create(name_jp: "小脳", name_en: "cerebellum", genre: "神経");
Question.create(name_jp: "視床", name_en: "thalamus", genre: "神経");
Question.create(name_jp: "脳神経", name_en: "cranial nerves", genre: "神経");
Question.create(name_jp: "反回神経", name_en: "recurrent laryngeal nerve", genre: "神経");
Question.create(name_jp: "自律神経", name_en: "autonomic nerve", genre: "神経");
Question.create(name_jp: "交感神経", name_en: "sympathetic nerve", genre: "神経");
Question.create(name_jp: "副交感神経", name_en: "parasympathetic nerve", genre: "神経");
Question.create(name_jp: "脳脊髄液", name_en: "cerebrospinal fluid", genre: "神経");
Question.create(name_jp: "てんかん発作", name_en: "epileptic seizure", genre: "神経");
Question.create(name_jp: "しびれ", name_en: "numbness", genre: "神経");
Question.create(name_jp: "痙攣", name_en: "convulsion", genre: "神経");
Question.create(name_jp: "振戦", name_en: "tremor", genre: "神経");
Question.create(name_jp: "失調", name_en: "ataxia", genre: "神経");
Question.create(name_jp: "無動", name_en: "akinesia", genre: "神経");
Question.create(name_jp: "筋緊張", name_en: "muscle tonus", genre: "神経");
Question.create(name_jp: "筋強剛", name_en: "muscle rigidity", genre: "神経");
Question.create(name_jp: "強直", name_en: "tetany", genre: "神経");
Question.create(name_jp: "萎縮", name_en: "atrophy", genre: "神経");
Question.create(name_jp: "群発頭痛", name_en: "cluster headache", genre: "神経");
Question.create(name_jp: "脳卒中", name_en: "apoplexy,stroke", genre: "神経");
Question.create(name_jp: "脳出血", name_en: "cerebral hemorrhage", genre: "神経");
Question.create(name_jp: "くも膜下出血", name_en: "subarachnoid hemorrhage", genre: "神経");
Question.create(name_jp: "硬膜下出血", name_en: "subdural hemorrhage", genre: "神経");
Question.create(name_jp: "動静脈奇形", name_en: "arteriovenous malformation", genre: "神経");
Question.create(name_jp: "脳梗塞", name_en: "cerebral infarction", genre: "神経");
Question.create(name_jp: "舞踏様運動", name_en: "chorea", genre: "神経");
Question.create(name_jp: "重症筋無力症", name_en: "myasthenia gravis", genre: "神経");
Question.create(name_jp: "てんかん", name_en: "epilepsy", genre: "神経");
Question.create(name_jp: "熱性痙攣", name_en: "febrile convulsion", genre: "神経");
Question.create(name_jp: "片頭痛", name_en: "migraine", genre: "神経");
Question.create(name_jp: "緊張型頭痛", name_en: "tension-type headache", genre: "神経");
Question.create(name_jp: "脳性麻痺", name_en: "cerebral palsy", genre: "神経");
Question.create(name_jp: "神経膠腫", name_en: "glioma", genre: "神経");
Question.create(name_jp: "髄膜腫", name_en: "meningioma", genre: "神経");
Question.create(name_jp: "脳波検査", name_en: "electroencephalography", genre: "神経");
Question.create(name_jp: "腰椎穿刺", name_en: "lumbar puncture", genre: "神経");

Question.create(name_jp: "見当識障害", name_en: "disorientation", genre: "救急");
Question.create(name_jp: "意識障害", name_en: "impaired consciousness", genre: "救急");
Question.create(name_jp: "気絶", name_en: "fainting", genre: "救急");
Question.create(name_jp: "脳振盪", name_en: "concussion", genre: "救急");
Question.create(name_jp: "気道閉塞", name_en: "airway obstruction", genre: "救急");
Question.create(name_jp: "中毒", name_en: "poisoning", genre: "救急");
Question.create(name_jp: "乱用", name_en: "abuse", genre: "救急");
Question.create(name_jp: "熱中症", name_en: "heat stroke", genre: "救急");
Question.create(name_jp: "発汗", name_en: "perspiration", genre: "救急");
Question.create(name_jp: "打撲傷", name_en: "contusion", genre: "救急");
Question.create(name_jp: "擦過傷", name_en: "abrasion", genre: "救急");
Question.create(name_jp: "血腫", name_en: "hematoma", genre: "救急");
Question.create(name_jp: "挿管", name_en: "intubation", genre: "救急");
Question.create(name_jp: "自動体外式除細動器", name_en: "Automated External Defibrillator", genre: "救急");
Question.create(name_jp: "デブリドマン", name_en: "debridement", genre: "救急");

Question.create(name_jp: "全身麻酔", name_en: "general anesthesia", genre: "麻酔");
Question.create(name_jp: "局所麻酔", name_en: "local anesthesia", genre: "麻酔");
Question.create(name_jp: "完全静脈麻酔", name_en: "total intravenous anesthesia", genre: "麻酔");

Question.create(name_jp: "入院", name_en: "admission", genre: "総論");
Question.create(name_jp: "外来", name_en: "outpatient", genre: "総論");
Question.create(name_jp: "禁忌", name_en: "contraindication", genre: "総論");
Question.create(name_jp: "細胞診", name_en: "cytology", genre: "総論");
Question.create(name_jp: "鑑別診断", name_en: "differential diagnosis", genre: "総論");
Question.create(name_jp: "退院", name_en: "discharge", genre: "総論");
Question.create(name_jp: "消毒", name_en: "disinfection", genre: "総論");
Question.create(name_jp: "用法", name_en: "usage", genre: "総論");
Question.create(name_jp: "適応", name_en: "indication", genre: "総論");
Question.create(name_jp: "生検", name_en: "biopsy", genre: "総論");
Question.create(name_jp: "視診", name_en: "inspection", genre: "総論");
Question.create(name_jp: "同側", name_en: "ipsilateral", genre: "総論");
Question.create(name_jp: "診察", name_en: "medical examination", genre: "総論");
Question.create(name_jp: "打診", name_en: "percussion", genre: "総論");
Question.create(name_jp: "聴診", name_en: "auscultation", genre: "総論");
Question.create(name_jp: "触診", name_en: "palpation", genre: "総論");
Question.create(name_jp: "眼底鏡", name_en: "ophthalmoscope", genre: "総論");
Question.create(name_jp: "耳鏡", name_en: "otoscope", genre: "総論");
Question.create(name_jp: "血圧計", name_en: "sphygmomanometer", genre: "総論");
Question.create(name_jp: "体温計", name_en: "thermometer", genre: "総論");
Question.create(name_jp: "鼻汁", name_en: "nasal discharge", genre: "総論");
Question.create(name_jp: "術後補助化学療法", name_en: "neoadjuvant chemotherapy", genre: "総論");
Question.create(name_jp: "生理食塩水", name_en: "saline", genre: "総論");
Question.create(name_jp: "舌圧子", name_en: "spatula", genre: "総論");
Question.create(name_jp: "聴診器", name_en: "stethoscope", genre: "総論");
Question.create(name_jp: "吸引", name_en: "aspiration,suction", genre: "総論");
Question.create(name_jp: "外用治療", name_en: "topical therapy", genre: "総論");
Question.create(name_jp: "緩和医療", name_en: "palliative medicine", genre: "総論");
Question.create(name_jp: "散発性", name_en: "sporadic", genre: "総論");
Question.create(name_jp: "遺伝性", name_en: "hereditary", genre: "総論");
Question.create(name_jp: "医原性", name_en: "iatrogenic", genre: "総論");
Question.create(name_jp: "特発性", name_en: "idiopathic", genre: "総論");
Question.create(name_jp: "続発性", name_en: "secondary", genre: "総論");
Question.create(name_jp: "悪寒", name_en: "chill", genre: "総論");
Question.create(name_jp: "全身倦怠感", name_en: "general malaise", genre: "総論");
Question.create(name_jp: "顔面蒼白", name_en: "pallor", genre: "総論");
Question.create(name_jp: "腫脹", name_en: "swelling", genre: "総論");
Question.create(name_jp: "肥大", name_en: "hypertrophy", genre: "総論");
Question.create(name_jp: "播種", name_en: "dissemination", genre: "総論");
Question.create(name_jp: "局所再発", name_en: "recurrence", genre: "総論");
Question.create(name_jp: "処方箋", name_en: "prescription", genre: "総論");
Question.create(name_jp: "先天性", name_en: "congenital", genre: "総論");
Question.create(name_jp: "広汎性", name_en: "diffuse", genre: "総論");
Question.create(name_jp: "近位", name_en: "proximal", genre: "総論");
Question.create(name_jp: "対側", name_en: "contralateral", genre: "総論");
Question.create(name_jp: "腹側", name_en: "ventral", genre: "総論");
Question.create(name_jp: "背側", name_en: "dorsal", genre: "総論");
Question.create(name_jp: "頭側", name_en: "cranial", genre: "総論");
Question.create(name_jp: "尾側", name_en: "caudal", genre: "総論");
Question.create(name_jp: "腹臥位", name_en: "prone position", genre: "総論");
Question.create(name_jp: "背臥位", name_en: "supine position", genre: "総論");
Question.create(name_jp: "側臥位", name_en: "lateral position", genre: "総論");
Question.create(name_jp: "砕石位", name_en: "lithotomy position", genre: "総論");
Question.create(name_jp: "間欠的", name_en: "intermittent", genre: "総論");
Question.create(name_jp: "持続的", name_en: "continuous", genre: "総論");
Question.create(name_jp: "前兆", name_en: "aura", genre: "総論");
Question.create(name_jp: "寛解", name_en: "remission", genre: "総論");
Question.create(name_jp: "形成外科学", name_en: "plastic surgery", genre: "総論");
Question.create(name_jp: "薬理学", name_en: "pharmacology", genre: "総論");

Question.create(name_jp: "小児科学", name_en: "pediatrics", genre: "小児科");
Question.create(name_jp: "授乳", name_en: "lactation", genre: "小児科");
Question.create(name_jp: "離乳", name_en: "delactation", genre: "小児科");
Question.create(name_jp: "口蓋裂", name_en: "cleft palate", genre: "小児科");

Question.create(name_jp: "婦人科学", name_en: "gynecology", genre: "産婦人科");
Question.create(name_jp: "産科学", name_en: "obstetrics", genre: "産婦人科");
Question.create(name_jp: "骨盤", name_en: "pelvis", genre: "産婦人科");
Question.create(name_jp: "子宮", name_en: "uterus", genre: "産婦人科");
Question.create(name_jp: "胎盤", name_en: "placenta", genre: "産婦人科");
Question.create(name_jp: "卵管", name_en: "oviduct", genre: "産婦人科");
Question.create(name_jp: "受精", name_en: "fertilization", genre: "産婦人科");
Question.create(name_jp: "妊娠", name_en: "pregnancy,gestation", genre: "産婦人科");
Question.create(name_jp: "人工妊娠中絶", name_en: "(artificial) abortion", genre: "産婦人科");
Question.create(name_jp: "自然流産", name_en: "spontaneous abortion", genre: "産婦人科");
Question.create(name_jp: "無月経", name_en: "amenorrhea", genre: "産婦人科");
Question.create(name_jp: "月経困難", name_en: "dysmenorrhea", genre: "産婦人科");
Question.create(name_jp: "つわり", name_en: "morning sickness", genre: "産婦人科");
Question.create(name_jp: "帯下", name_en: "discharge", genre: "産婦人科");
Question.create(name_jp: "胎芽", name_en: "embryo", genre: "産婦人科");
Question.create(name_jp: "胎児", name_en: "fetus", genre: "産婦人科");
Question.create(name_jp: "分娩", name_en: "delivery,confinement", genre: "産婦人科");
Question.create(name_jp: "閉経", name_en: "menopause", genre: "産婦人科");
Question.create(name_jp: "子宮内膜症", name_en: "endometriosis", genre: "産婦人科");
Question.create(name_jp: "子宮筋腫", name_en: "uterine myoma,uterine fibroid", genre: "産婦人科");
Question.create(name_jp: "子宮外妊娠", name_en: "ectopic pregnancy", genre: "産婦人科");
Question.create(name_jp: "更年期障害", name_en: "menopausal symptom", genre: "産婦人科");
Question.create(name_jp: "妊娠検査", name_en: "pregnancy test", genre: "産婦人科");
Question.create(name_jp: "経口避妊薬", name_en: "oral contraceptive", genre: "産婦人科");
Question.create(name_jp: "不妊手術", name_en: "sterilization", genre: "産婦人科");
Question.create(name_jp: "帝王切開", name_en: "caesarean section", genre: "産婦人科");

Question.create(name_jp: "眼科学", name_en: "ophthalmology", genre: "眼科");
Question.create(name_jp: "角膜", name_en: "cornea", genre: "眼科");
Question.create(name_jp: "ぶどう膜", name_en: "uvea", genre: "眼科");
Question.create(name_jp: "脈絡膜", name_en: "chorioidea", genre: "眼科");
Question.create(name_jp: "虹彩", name_en: "iris", genre: "", genre: "眼科");
Question.create(name_jp: "硝子体", name_en: "vitreous body", genre: "眼科");
Question.create(name_jp: "強膜", name_en: "sclera", genre: "眼科");
Question.create(name_jp: "眼瞼", name_en: "eyelid,palpebra", genre: "眼科");
Question.create(name_jp: "眼球結膜", name_en: "bulbar conjunctiva", genre: "眼科");
Question.create(name_jp: "眼瞼結膜", name_en: "palpebral conjunctiva", genre: "眼科");
Question.create(name_jp: "近視", name_en: "myopia", genre: "眼科");
Question.create(name_jp: "遠視", name_en: "hyperopia", genre: "眼科");
Question.create(name_jp: "斜視", name_en: "squinting", genre: "眼科");
Question.create(name_jp: "複視", name_en: "diplopia", genre: "眼科");
Question.create(name_jp: "飛蚊症", name_en: "floater", genre: "眼科");
Question.create(name_jp: "充血", name_en: "hyperemia", genre: "眼科");
Question.create(name_jp: "結膜炎", name_en: "conjunctivitis", genre: "眼科");
Question.create(name_jp: "角膜炎", name_en: "keratitis", genre: "眼科");
Question.create(name_jp: "白内障", name_en: "cataract", genre: "眼科");
Question.create(name_jp: "緑内障", name_en: "glaucoma", genre: "眼科");
Question.create(name_jp: "網膜剥離", name_en: "retinal detachment", genre: "眼科");

Question.create(name_jp: "耳鼻咽喉科学", name_en: "otorhinolaryngology", genre: "耳鼻咽喉科");
Question.create(name_jp: "鼓膜", name_en: "eardrum,tympanic membrane", genre: "耳鼻咽喉科");
Question.create(name_jp: "蝸牛", name_en: "cochlea", genre: "耳鼻咽喉科");
Question.create(name_jp: "舌", name_en: "tongue", genre: "耳鼻咽喉科");
Question.create(name_jp: "咽頭", name_en: "pharynx", genre: "耳鼻咽喉科");
Question.create(name_jp: "喉頭", name_en: "larynx", genre: "耳鼻咽喉科");
Question.create(name_jp: "副鼻腔", name_en: "paranasal sinus", genre: "耳鼻咽喉科");
Question.create(name_jp: "耳鳴", name_en: "tinnitus", genre: "耳鼻咽喉科");
Question.create(name_jp: "浮動性めまい", name_en: "dizziness", genre: "耳鼻咽喉科");
Question.create(name_jp: "回転性めまい", name_en: "vertigo", genre: "耳鼻咽喉科");
Question.create(name_jp: "眼振", name_en: "nystagmus", genre: "耳鼻咽喉科");
Question.create(name_jp: "難聴", name_en: "deafness", genre: "耳鼻咽喉科");
Question.create(name_jp: "鼻出血", name_en: "epistaxis", genre: "耳鼻咽喉科");
Question.create(name_jp: "喉頭炎", name_en: "laryngitis", genre: "耳鼻咽喉科");
Question.create(name_jp: "扁桃炎", name_en: "tonsillitis", genre: "耳鼻咽喉科");
Question.create(name_jp: "中耳炎", name_en: "otitis media", genre: "耳鼻咽喉科");
Question.create(name_jp: "副鼻腔炎", name_en: "sinusitis", genre: "耳鼻咽喉科");

Question.create(name_jp: "整形外科学", name_en: "orthopedics", genre: "整形外科");
Question.create(name_jp: "腱", name_en: "tendon", genre: "整形外科");
Question.create(name_jp: "軟骨", name_en: "cartilage", genre: "整形外科");
Question.create(name_jp: "滑膜", name_en: "synovium", genre: "整形外科");
Question.create(name_jp: "外転", name_en: "abduction", genre: "整形外科");
Question.create(name_jp: "内転", name_en: "adduction", genre: "整形外科");
Question.create(name_jp: "屈曲", name_en: "flexion", genre: "整形外科");
Question.create(name_jp: "伸展", name_en: "extension", genre: "整形外科");
Question.create(name_jp: "弛緩", name_en: "relaxation", genre: "整形外科");
Question.create(name_jp: "収縮", name_en: "contraction", genre: "整形外科");
Question.create(name_jp: "四肢", name_en: "extremities", genre: "整形外科");
Question.create(name_jp: "跛行", name_en: "claudication,limping", genre: "整形外科");
Question.create(name_jp: "間欠性跛行", name_en: "intermittent claudication", genre: "整形外科");
Question.create(name_jp: "関節リウマチ", name_en: "rheumatoid arthritis", genre: "整形外科");
Question.create(name_jp: "変形性関節症", name_en: "osteoarthritis", genre: "整形外科");
Question.create(name_jp: "関節炎", name_en: "arthritis", genre: "整形外科");
Question.create(name_jp: "椎間板ヘルニア", name_en: "disk herniation", genre: "整形外科");
Question.create(name_jp: "脊柱菅狭窄症", name_en: "spinal stenosis", genre: "整形外科");
Question.create(name_jp: "脊柱側彎症", name_en: "scoliosis", genre: "整形外科");
Question.create(name_jp: "徒手筋力検査", name_en: "manual muscle test", genre: "整形外科");
Question.create(name_jp: "筋電図検査", name_en: "electromyography", genre: "整形外科");

Question.create(name_jp: "精神科学", name_en: "psychiatry", genre: "精神科");
Question.create(name_jp: "不眠症", name_en: "insomnia", genre: "精神科");
Question.create(name_jp: "幻覚", name_en: "hallucination", genre: "精神科");
Question.create(name_jp: "妄想", name_en: "delusion", genre: "精神科");
Question.create(name_jp: "不安", name_en: "anxiety", genre: "精神科");
Question.create(name_jp: "不隠", name_en: "agitation", genre: "精神科");
Question.create(name_jp: "躁状態", name_en: "manic state", genre: "精神科");
Question.create(name_jp: "食思不振", name_en: "anorexia", genre: "精神科");
Question.create(name_jp: "せん妄", name_en: "delirium", genre: "精神科");
Question.create(name_jp: "躁病", name_en: "mania", genre: "精神科");
Question.create(name_jp: "統合失調症", name_en: "schizophrenia", genre: "精神科");
Question.create(name_jp: "ヒステリー", name_en: "hysteria", genre: "精神科");
Question.create(name_jp: "自閉症", name_en: "autism", genre: "精神科");

Question.create(name_jp: "皮膚科学", name_en: "dermatology", genre: "皮膚科");
Question.create(name_jp: "掻痒", name_en: "itching", genre: "皮膚科");
Question.create(name_jp: "褥瘡", name_en: "decubitus", genre: "皮膚科");
Question.create(name_jp: "紅斑", name_en: "erythema", genre: "皮膚科");
Question.create(name_jp: "紫斑", name_en: "purpura", genre: "皮膚科");
Question.create(name_jp: "丘疹", name_en: "papule", genre: "皮膚科");
Question.create(name_jp: "結節", name_en: "node", genre: "皮膚科");
Question.create(name_jp: "水疱", name_en: "blister", genre: "皮膚科");
Question.create(name_jp: "びらん", name_en: "erosion", genre: "皮膚科");
Question.create(name_jp: "湿疹", name_en: "eczema", genre: "皮膚科");
Question.create(name_jp: "蕁麻疹", name_en: "urticaria", genre: "皮膚科");
Question.create(name_jp: "薬疹", name_en: "drug eruption", genre: "皮膚科");
Question.create(name_jp: "脱毛症", name_en: "alopecia,baldness", genre: "皮膚科");
Question.create(name_jp: "アトピー性皮膚炎", name_en: "atopic dermatitis", genre: "皮膚科");

Question.create(name_jp: "泌尿器科学", name_en: "urology", genre: "泌尿器科");
Question.create(name_jp: "尿管", name_en: "ureter", genre: "泌尿器科");
Question.create(name_jp: "尿道", name_en: "urethra", genre: "泌尿器科");
Question.create(name_jp: "陰茎", name_en: "penis", genre: "泌尿器科");
Question.create(name_jp: "精巣", name_en: "testis,testicle", genre: "泌尿器科");
Question.create(name_jp: "精子", name_en: "sperm", genre: "泌尿器科");
Question.create(name_jp: "多尿", name_en: "polyuria", genre: "泌尿器科");
Question.create(name_jp: "乏尿", name_en: "oliguria", genre: "泌尿器科");
Question.create(name_jp: "無尿", name_en: "anuria", genre: "泌尿器科");
Question.create(name_jp: "排尿困難", name_en: "dysuria", genre: "泌尿器科");
Question.create(name_jp: "尿失禁", name_en: "urinary incontinence", genre: "泌尿器科");
Question.create(name_jp: "蛋白尿", name_en: "proteinuria", genre: "泌尿器科");
Question.create(name_jp: "血尿", name_en: "hematuria", genre: "泌尿器科");
Question.create(name_jp: "膿尿", name_en: "pyuria", genre: "泌尿器科");
Question.create(name_jp: "尿路結石", name_en: "urolithiasis", genre: "泌尿器科");
Question.create(name_jp: "腎結石", name_en: "renal stone", genre: "泌尿器科");
Question.create(name_jp: "前立腺肥大症", name_en: "benign prostatic hyperplasia", genre: "泌尿器科");

Question.create(name_jp: "放射線化学", name_en: "radiology", genre: "放射線科");
Question.create(name_jp: "造影剤", name_en: "contrast media,contrast agent", genre: "放射線科");
Question.create(name_jp: "造影", name_en: "imaging", genre: "放射線科");
Question.create(name_jp: "照射", name_en: "irradiation", genre: "放射線科");

Question.create(name_jp: "介入", name_en: "intervention", genre: "公衆衛生");
Question.create(name_jp: "罹患率", name_en: "morbidity rate", genre: "公衆衛生");
Question.create(name_jp: "有病率", name_en: "prevalence rate", genre: "公衆衛生");
Question.create(name_jp: "的中率", name_en: "predictive value", genre: "公衆衛生");
Question.create(name_jp: "予防医学", name_en: "preventive medicine", genre: "公衆衛生");



Genre.create(genre_jp: "消化器")
Genre.create(genre_jp: "循環器")
Genre.create(genre_jp: "内分泌")
Genre.create(genre_jp: "腎臓")
Genre.create(genre_jp: "血液")
Genre.create(genre_jp: "感染症")
Genre.create(genre_jp: "呼吸器")
Genre.create(genre_jp: "神経")
Genre.create(genre_jp: "救急")
Genre.create(genre_jp: "麻酔")
Genre.create(genre_jp: "総論")
Genre.create(genre_jp: "小児科")
Genre.create(genre_jp: "産婦人科")
Genre.create(genre_jp: "眼科")
Genre.create(genre_jp: "耳鼻咽喉科")
Genre.create(genre_jp: "整形外科")
Genre.create(genre_jp: "精神科")
Genre.create(genre_jp: "皮膚科")
Genre.create(genre_jp: "泌尿器科")
Genre.create(genre_jp: "放射線科")
Genre.create(genre_jp: "公衆衛生")

