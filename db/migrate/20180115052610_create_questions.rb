class CreateQuestions < ActiveRecord::Migration[5.1]
  def change
    create_table :questions do |t|
      t.string :name_jp
      t.string :name_en

      t.timestamps
    end
  end
end
