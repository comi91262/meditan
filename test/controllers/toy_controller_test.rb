require 'test_helper'

class ToyControllerTest < ActionDispatch::IntegrationTest
  test "should get title" do
    get toy_title_url
    assert_response :success
  end

end
