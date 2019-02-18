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
                ['name_jp' => '消化器学', 'name_en' => 'gastroenterology', 'department' => '消化器'],
                ['name_jp' => '空腸', 'name_en' => 'jejunum', 'department' => '消化器'],
                ['name_jp' => '回腸', 'name_en' => 'ileum', 'department' => '消化器'],
                ['name_jp' => '盲腸', 'name_en' => 'cecum', 'department' => '消化器'],
                ['name_jp' => '憩室', 'name_en' => 'diverticulum', 'department' => '消化器'],
                ['name_jp' => '消化', 'name_en' => 'digestion', 'department' => '消化器'],
                ['name_jp' => '消化不良', 'name_en' => 'indigestion', 'department' => '消化器'],
                ['name_jp' => '食欲低下', 'name_en' => 'anorexia', 'department' => '消化器'],
                ['name_jp' => '拒食症', 'name_en' => 'anorexia', 'department' => '消化器'],
                ['name_jp' => '嚥下障害', 'name_en' => 'dysphagia', 'department' => '消化器'],
                ['name_jp' => '胸やけ', 'name_en' => 'heartburn', 'department' => '消化器'],
                ['name_jp' => '吐血', 'name_en' => 'hematemesis', 'department' => '消化器'],
                ['name_jp' => '下血', 'name_en' => 'melena', 'department' => '消化器'],
                ['name_jp' => '便秘', 'name_en' => 'constipation', 'department' => '消化器'],
                ['name_jp' => '腹部膨満感', 'name_en' => 'bloating', 'department' => '消化器'],
                ['name_jp' => '膨隆', 'name_en' => 'protrusion', 'department' => '消化器'],
                ['name_jp' => '胃食道逆流症', 'name_en' => 'gastroesophageal reflux disease', 'department' => '消化器'],
                ['name_jp' => '食道静脈瘤', 'name_en' => 'esophageal varix', 'department' => '消化器'],
                ['name_jp' => '腸重積', 'name_en' => 'intussusception', 'department' => '消化器'],
                ['name_jp' => '潰瘍性大腸炎', 'name_en' => 'ulcerative colitis', 'department' => '消化器'],
                ['name_jp' => '汎発性腹膜炎', 'name_en' => 'Pan-peritonitis', 'department' => '消化器'],
                ['name_jp' => '過敏性腸症候群', 'name_en' => 'irritable bowel syndrome', 'department' => '消化器'],
                ['name_jp' => '痔核', 'name_en' => 'hemorrhoid', 'department' => '消化器'],
                ['name_jp' => '総胆管', 'name_en' => 'common bile duct', 'department' => '消化器'],
                ['name_jp' => '胆嚢管', 'name_en' => 'cystic duct', 'department' => '消化器'],
                ['name_jp' => '胆汁', 'name_en' => 'bile', 'department' => '消化器'],
                ['name_jp' => '腹水', 'name_en' => 'ascites', 'department' => '消化器'],
                ['name_jp' => '黄疸', 'name_en' => 'jaundice,icterus', 'department' => '消化器'],
                ['name_jp' => '肝性脳症', 'name_en' => 'hepatic encephalopathy', 'department' => '消化器'],
                ['name_jp' => '胆管炎', 'name_en' => ' cholangitis', 'department' => '消化器'],
                ['name_jp' => '胆嚢炎', 'name_en' => 'cholecystitis', 'department' => '消化器'],
                ['name_jp' => '狭心症', 'name_en' => 'angina pectoris', 'department' => '循環器'],
                ['name_jp' => '心筋症', 'name_en' => 'cardiomyopathy', 'department' => '循環器'],
                ['name_jp' => '動脈瘤', 'name_en' => 'aneurysm', 'department' => '循環器'],
                ['name_jp' => '弁膜症', 'name_en' => 'valvular heart disease', 'department' => '循環器'],
                ['name_jp' => '心臓病学', 'name_en' => 'cardiology', 'department' => '循環器'],
                ['name_jp' => '上腕動脈', 'name_en' => 'brachial artery', 'department' => '循環器'],
                ['name_jp' => '大腿動脈', 'name_en' => 'femoral artery', 'department' => '循環器'],
                ['name_jp' => '動脈硬化', 'name_en' => 'arteriosclerosis', 'department' => '循環器'],
                ['name_jp' => '心内膜炎', 'name_en' => 'endocarditis', 'department' => '循環器'],
                ['name_jp' => '心房細動', 'name_en' => 'atrial fibrillation', 'department' => '循環器'],
                ['name_jp' => '橈側皮静脈', 'name_en' => 'cephalic vein', 'department' => '循環器'],
                ['name_jp' => '大動脈弁狭窄症', 'name_en' => 'aortic stenosis', 'department' => '循環器'],
                ['name_jp' => 'アテローム硬化', 'name_en' => 'atherosclerosis', 'department' => '循環器'],
                ['name_jp' => '大動脈弁閉鎖不全', 'name_en' => 'aortic regurgitation', 'department' => '循環器']
            ]
        );
    }
}
