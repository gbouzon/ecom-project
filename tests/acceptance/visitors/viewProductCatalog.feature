Feature: view the product catalog for a store
    In order to browse a store's catalog
    As a visitor
    I need to be able to view the products of registered stores

    Scenario: try viewing the product catalog
    Given I am on page "/Main/index"
    When I click "The Jane Store"
    Then I see "Strawberry cupcake"