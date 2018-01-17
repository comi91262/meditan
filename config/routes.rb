Rails.application.routes.draw do
    get '/questions/search', to: 'questions#search'
    resources :questions 
    get '/', to: 'test#index' 
end
