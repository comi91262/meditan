class QuestionsController < ApplicationController
    def index
        Question.delete_all

        Test.find_each do |record|
            question = Question.new
            question.attributes = record.attributes
            question.save()
        end
        render json: Question.all
        #render json: "ok!"

    end
    def search 
        q = params[:q]
        text = params[:text]
        question = Question.find(q)
        if question.name_en == text then
            render json: {result: true}
        else 
            render json: {result: false, answer: question.name_en}
        end
       
    end

    def show
        id = params[:id]
        question = Question.find(id)

        render json: question
    end

    def create
        Question.delete_all

        Test.find_each do |record|
            question = Question.new
            question.attributes = record.to_h
            question.save()
        end

        #@questions = Question.all

        #render json: @questions
    end

end
