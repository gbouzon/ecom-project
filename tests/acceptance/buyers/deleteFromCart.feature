Feature: delete an item from the cart
    In order to properly being able to shop
    As a buyer
    I need to be able to delete an item from my cart

    Scenario: try deleting item from cart
    Given I am logged in with "tester@gmail.com" and "1234" and have added an item to cart and click "Cart"
    When I click "Delete"
    Then I see "Your cart is empty!"