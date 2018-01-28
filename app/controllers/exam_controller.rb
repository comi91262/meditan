class ExamController < ApplicationController
    def index
        render 'exam' 
    end

    def select1 
        render 'select1' 
    end

    def select2
        @genres = Genre.all
        render 'select2'
    end
end
