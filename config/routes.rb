Rails.application.routes.draw do

  get '/', to: 'home#index'

  get '/exam',    to: 'exam#index' 
  get '/exam/select1', to: 'exam#select1'
  get '/exam/select2', to: 'exam#select2'

  get '/review',  to: 'review#index' 
  get '/summary', to: 'summary#index' 


  get 'questions/search', to: 'questions#search'
  get 'questions/create', to: 'questions#create'
  resources :questions 
  resources :genres
end
