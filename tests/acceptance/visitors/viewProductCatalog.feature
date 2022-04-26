Feature: view the product catalog for a store
    In order to browse a store's catalog
    As a visitor
    I need to be able to view the products of registered stores

    Scenario: try viewing the product catalog
    Given I am on page "/Main/index"
    When I click "The Jane Store"
    Then I see "Strawberry cupcake"

    Scenario: try adding an item to my catalog
    Given I am logged in with "candy@gmail.com" and "1234" and click "Add a product"
    When I enter "Chocolate Cupcake" in "product_name" and check "#checkboxproduct" and "3" in "product_price" and click "Add!"
    Then I see "Chocolate Cupcake" and "Price: $3"