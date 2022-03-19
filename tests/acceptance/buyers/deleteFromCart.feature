Feature: delete an item from the cart
    In order to properly being able to shop
    As a buyer
    I need to be able to delete an item from my cart

    Scenario: try deleting item from cart
    Given I am logged into my account and there is at least on item in my cart
    When I click on "Remove item from cart"
    Then I see "Item successfully removed"