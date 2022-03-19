Feature: view the product catalog for a store
    In order to browse a store's catalog
    As a visitor
    I need to be able to view the products of registered stores

    Scenario: try viewing the product catalog
    Given I am on a store's page
    When I click on "Menu"
    Then I see the store's menu