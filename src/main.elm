import Browser
import Html exposing (Html, Attribute, div, input, text, button)
import Html.Attributes exposing (..)
import Html.Events exposing (onClick, onInput)

main =
  Browser.sandbox { init = 0, update = update, view = view }

type Msg = Increment | Decrement

type InputEvent = Change String

 update msg model =
  case msg of
    Increment ->
      model + 2

    Decrement ->
      model - 1 

view model =
  div []
    [ input [ placeholder "Text to reverse", value model.content, onInput Change ] []
    , button [ onClick Decrement ] [ text "-" ]
    , div [] [ text (String.fromInt model) ]
    , button [ onClick Increment ] [ text "+" ]
    ]