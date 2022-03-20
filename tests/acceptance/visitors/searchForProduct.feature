Feature: search for products
    In order to find a product
    As a visitor
    I need to be able to search the product catalog

    Scenario: try searching for an existing product of a store
    Given I enter in the search bar "Pizza" and am on page "/Main/index" and choose option "Search By Product"
    When I click "Search"
    Then I see "Cheese Pizza"

    Scenario: try searching for a product the store does not sell
    Given I enter in the search bar "Puppy" and am on page "/Main/index" and choose option "Search By Product"
    When I click "Search"
    Then I see "The search returned no results."