Feature: view the stores registered in the application
    In order to browse the store catalog
    As a visitor
    I need to be able to view the stores registered in the application

    Scenario: try viewing the store catalog
    Given I am on page "/Main/index"
    When I click "Home"
    Then I see "Pizza Store" and "Jane Store"