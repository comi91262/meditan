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
        lang = session[:lang]
        question = Question.find(q)

        if lang == 'en' then 
            answer_text = question.name_jp
        else
            answer_text = question.name_en
        end

        if answer_text == text then
            render json: {result: true}
        else 
            render json: {result: false, answer: answer_text}
        end

    end

    def show
        id = params[:id]
        lang = session[:lang]

        question = Question.find(id)
        if lang == 'jp' then
            render json: {question: question.name_jp}
        elsif lang == 'en' then
            render json: {question: question.name_en}
        end
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
