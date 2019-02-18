<?php

use Illuminate\Database\Seeder;

class TermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('terms')->insert(
            [
                ['name_jp' => '消化器学', 'name_en' => 'gastroenterology', 'category' => '消化器'],
                ['name_jp' => '空腸', 'name_en' => 'jejunum', 'category' => '消化器'],
                ['name_jp' => '回腸', 'name_en' => 'ileum', 'category' => '消化器'],
                ['name_jp' => '盲腸', 'name_en' => 'cecum', 'category' => '消化器'],
                ['name_jp' => '憩室', 'name_en' => 'diverticulum', 'category' => '消化器'],
                ['name_jp' => '消化', 'name_en' => 'digestion', 'category' => '消化器'],
                ['name_jp' => '消化不良', 'name_en' => 'indigestion', 'category' => '消化器'],
                ['name_jp' => '食欲低下', 'name_en' => 'anorexia', 'category' => '消化器'],
                ['name_jp' => '拒食症', 'name_en' => 'anorexia', 'category' => '消化器'],
                ['name_jp' => '嚥下障害', 'name_en' => 'dysphagia', 'category' => '消化器'],
                ['name_jp' => '胸やけ', 'name_en' => 'heartburn', 'category' => '消化器'],
                ['name_jp' => '吐血', 'name_en' => 'hematemesis', 'category' => '消化器'],
                ['name_jp' => '下血', 'name_en' => 'melena', 'category' => '消化器'],
                ['name_jp' => '便秘', 'name_en' => 'constipation', 'category' => '消化器'],
                ['name_jp' => '腹部膨満感', 'name_en' => 'bloating', 'category' => '消化器'],
                ['name_jp' => '膨隆', 'name_en' => 'protrusion', 'category' => '消化器'],
                ['name_jp' => '胃食道逆流症', 'name_en' => 'gastroesophageal reflux disease', 'category' => '消化器'],
                ['name_jp' => '食道静脈瘤', 'name_en' => 'esophageal varix', 'category' => '消化器'],
                ['name_jp' => '腸重積', 'name_en' => 'intussusception', 'category' => '消化器'],
                ['name_jp' => '潰瘍性大腸炎', 'name_en' => 'ulcerative colitis', 'category' => '消化器'],
                ['name_jp' => '汎発性腹膜炎', 'name_en' => 'Pan-peritonitis', 'category' => '消化器'],
                ['name_jp' => '過敏性腸症候群', 'name_en' => 'irritable bowel syndrome', 'category' => '消化器'],
                ['name_jp' => '痔核', 'name_en' => 'hemorrhoid', 'category' => '消化器'],
                ['name_jp' => '総胆管', 'name_en' => 'common bile duct', 'category' => '消化器'],
                ['name_jp' => '胆嚢管', 'name_en' => 'cystic duct', 'category' => '消化器'],
                ['name_jp' => '胆汁', 'name_en' => 'bile', 'category' => '消化器'],
                ['name_jp' => '腹水', 'name_en' => 'ascites', 'category' => '消化器'],
                ['name_jp' => '黄疸', 'name_en' => 'jaundice,icterus', 'category' => '消化器'],
                ['name_jp' => '肝性脳症', 'name_en' => 'hepatic encephalopathy', 'category' => '消化器'],
                ['name_jp' => '胆管炎', 'name_en' => ' cholangitis', 'category' => '消化器'],
                ['name_jp' => '胆嚢炎', 'name_en' => 'cholecystitis', 'category' => '消化器'],
                ['name_jp' => '狭心症', 'name_en' => 'angina pectoris', 'category' => '循環器'],
                ['name_jp' => '心筋症', 'name_en' => 'cardiomyopathy', 'category' => '循環器'],
                ['name_jp' => '動脈瘤', 'name_en' => 'aneurysm', 'category' => '循環器'],
                ['name_jp' => '弁膜症', 'name_en' => 'valvular heart disease', 'category' => '循環器'],
                ['name_jp' => '心臓病学', 'name_en' => 'cardiology', 'category' => '循環器'],
                ['name_jp' => '上腕動脈', 'name_en' => 'brachial artery', 'category' => '循環器'],
                ['name_jp' => '大腿動脈', 'name_en' => 'femoral artery', 'category' => '循環器'],
                ['name_jp' => '動脈硬化', 'name_en' => 'arteriosclerosis', 'category' => '循環器'],
                ['name_jp' => '心内膜炎', 'name_en' => 'endocarditis', 'category' => '循環器'],
                ['name_jp' => '心房細動', 'name_en' => 'atrial fibrillation', 'category' => '循環器'],
                ['name_jp' => '橈側皮静脈', 'name_en' => 'cephalic vein', 'category' => '循環器'],
                ['name_jp' => '大動脈弁狭窄症', 'name_en' => 'aortic stenosis', 'category' => '循環器'],
                ['name_jp' => 'アテローム硬化', 'name_en' => 'atherosclerosis', 'category' => '循環器'],
                ['name_jp' => '大動脈弁閉鎖不全', 'name_en' => 'aortic regurgitation', 'category' => '循環器']
            ]
        );
    }
}
