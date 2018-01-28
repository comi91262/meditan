/* eslint no-console:0 */
// This file is automatically compiled by Webpack, along with any other files
// present in this directory. You're encouraged to place your actual application logic in
// a relevant structure within app/javascript and only use these pack files to reference
// that code so it'll be compiled.
//
// To reference this file, add <%= javascript_pack_tag 'application' %> to the appropriate
// layout file, like app/views/layouts/application.html.erb


import { h, app } from "hyperapp"
import { header, section, nav, div,h2,h1, a, p, span, button, input} from "@hyperapp/html"
import request from 'superagent'


const root_url = location.protocol + '//' + location.hostname + ':' + location.port;

const state = {
}


const actions = {
}


const header_layout = () =>
    header({}, [
        nav({class: "navbar navbar-inverse bg-faded"}, [
            a({class: "navbar-brand", href: '/'}, "Medical Term Test"),
            a({class: "navbar-brand nav-link", href: "/exam"}, "テスト"),
            a({class: "navbar-brand nav-link", href: "/review"}, "復習"),
            a({class: "navbar-brand nav-link", href: "/summary"}, "まとめ"),
        ])
    ])





const view = (state, actions) =>
    h("div", {}, [
        header_layout(),
    ])

window.main = app(state, actions, view, document.body)

