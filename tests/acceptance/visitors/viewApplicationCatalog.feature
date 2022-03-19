Feature: view the stores registered in the application
    In order to browse the store catalog
    As a visitor
    I need to be able to view the stores registered in the application

    Scenario: try viewing the store catalog
    Given I am on the application
    When I click on "Home Page"
    Then I see a list of stores