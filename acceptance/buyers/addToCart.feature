Feature: add an item to the cart
    In order to purchase products
    As a buyer
    I need to be able to add items to cart

    Scenario: try adding a product to the cart
    Given I am logged into my account
    When I click on "Add to cart"
    Then I see "Item added to cart"

    Scenario: try adding a product to the cart incorrectly
    Given I am not logged into the application
    When I click on "Add to cart"
    Then I see "Please log in"