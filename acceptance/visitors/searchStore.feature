Feature: search a store for products
    In order to find a product
    As a visitor
    I need to be able to search stores' product catalog

    Scenario: try searching for an existing product of a store
    Given I am on the store's page
    When I enter the name of the product on the search bar and press "Enter"
    Then I see the product name and its description

    Scenario: try searching for a product the store does not sell
    Given I am on the store's page
    When I enter the name of the product on the search bar and press "Enter"
    Then I see "Product not found"