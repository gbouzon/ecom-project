Feature: add an item to the cart
    In order to purchase products
    As a buyer
    I need to be able to add items to cart

    Scenario: try adding a product to the cart
    Given I am logged in with "tester@gmail.com" and "1234" and am on page "/Store/index/1"
    When I click "Add to Cart" and click "Cart"
    Then I see "Place Order"