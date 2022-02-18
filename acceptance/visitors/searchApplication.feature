Feature: search application for stores
    In order to find a specific store within the application
    As a visitor
    I need to be able to search the application for the store

    Scenario: try searching for a registered store
    Given I enter the store name in the search bar
    When I press "Enter"
    Then I see the link with the name of the store I searched for

    Scenario: try searching for a store that isn't registered
    Given I enter the store name in the search bar
    When I press "Enter"
    Then I see "No stores were found with that name"