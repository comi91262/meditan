/* eslint no-console:0 */
// This file is automatically compiled by Webpack, along with any other files
// present in this directory. You're encouraged to place your actual application logic in
// a relevant structure within app/javascript and only use these pack files to reference
// that code so it'll be compiled.
//
// To reference this file, add <%= javascript_pack_tag 'application' %> to the appropriate
// layout file, like app/views/layouts/application.html.erb


//const promise = new Promise((resolve, reject) => {
//  if ('処理が成功') {
//    resolve(1);
//  } else {
//    reject(new Error('error'));
//  }
//});
//
import { h, app } from "hyperapp"
import { header, section, nav, div,h2,h1, a, p, span, button, input} from "@hyperapp/html"
import request from 'superagent'


const root_url = location.protocol + '//' + location.hostname;

const state = {
    q: 1,
    text: '',
    answer_text: '',
    show_result: false,
    is_correct: true,
    input: 'ここに入力してね'
}




const actions = {
    up: () => state => ({q: state.q + 1}),
    update: text => ({text: text}),
    update2: input => ({input}),
    update_answer_text: text=> ({answer_text: text}),
    show_answer: bool =>  ({is_correct: bool}),
    show_result: bool => ({show_result: bool}),
    create: () => state => {
        request
            .get("/questions/" + state.q) 
            .end(function(err, res){
                console.log(state.q)
                console.log(res.body.name_jp)
                main.update(res.body.name_jp)
            })
    },
    send: text => state => {
        if (!state.show_result){
            request
                .get(root_url + "/questions/search")
                .query({q: state.q, text: text})
                .end(function(err, res){
                    if(err && err.status === 404) {
                        console.log(err);
                    }
                    if (!res.body.result){
                        main.update_answer_text(res.body.answer); 
                    } 
                    main.show_answer(res.body.result);
                    main.show_result(true);
                    main.up();
                })
        }
    },
    to_next: () => state => {
        main.show_result(false);
        request
            .get("/questions/" + state.q) 
            .end(function(err, res){
                console.log(state.q)
                console.log(res.body.name_jp)
                main.update(res.body.name_jp)
            })
    }

}


const header_layout = () =>
    header({}, [
        nav({class: "navbar navbar-inverse bg-faded"}, [
            a({class: "navbar-brand", href: '/'}, "Medical Term Test"),
            a({class: "navbar-brand nav-link", href: "/toy/title"}, "テスト"),
            a({class: "navbar-brand nav-link", href: "/toy/title"}, "やり直しテスト"),
            a({class: "navbar-brand nav-link", href: "/toy/title"}, "一覧"),
        ])
    ])





const view = (state, actions) =>
    h("div", {}, [
        header_layout(),
        section({}, [
            div({class: "container"}, [
                div({class: "row"}, [
                    div({class: "col-md-6 col-sm-6"}, [
                            h1({ oncreate: actions.create,
                                onclick: () => console.log("a") }, state.text),
                            input({ class: 'form-control',
                                type: 'text',
                                placeholder: state.input,
                                onkeypress: ({target: {value}}) => actions.send(value)})
                    ]),
                    state.show_result?
                    div({class: "col-md-6 col-sm-6"}, [ 
                        h2({}, state.is_correct? '正解！':'間違い(><)'),
                        h2({}, state.is_correct? '':'正解は'+ state.answer_text +'でした'),
                        button({class: "btn btn-primary", onclick: actions.to_next}, "次に問題に進む")
                    ]): null
                ])
            ])
        ])
    ])
//
//    <label> 問題！</label>
//    </p>
//    <p>
//    <input type="text" class="form-control" placeholder="ここに入力してね！">
//    </p>

//const view = (state, actions) =>
//  h("div", {}, [
//    h("h1", {}, state.count),
//    h("button", { onclick: () => actions.down(1) }, "–"),
//    h("button", { onclick: () => actions.up(1) }, "+")
//  ])

window.main = app(state, actions, view, document.body)

