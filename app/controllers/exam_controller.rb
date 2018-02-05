class ExamController < ApplicationController
    def index
        genre = params[:genre]
        session[:genre] = genre
        render 'exam'
    end

    def select1 
        render 'select1' 
    end

    def select2
        lang = params[:lang]
        session[:lang] = lang
        @genres = Genre.all
        render 'select2'
    end
end
