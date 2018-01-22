Rails.application.routes.draw do
    get '/questions/search', to: 'questions#search'
    get '/questions/create', to: 'questions#create'
    resources :questions 
    get '/', to: 'test#index' 
end
