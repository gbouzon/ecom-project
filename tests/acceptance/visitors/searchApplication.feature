Feature: search application for stores
    In order to find a specific store within the application
    As a visitor
    I need to be able to search the application for the store

    Scenario: try searching for a registered store
    Given I enter in the search bar "Store" and am on page "/Main/index"
    When I click "Search"
    Then I see "Store"

    Scenario: try searching for a store that isn't registered
    Given I enter in the search bar "Dog" and am on page "/Main/index"
    When I click "Search"
    Then I see "The search returned no results."