Feature: add store to easy access
    In order to easily access stores 
    As a buyer
    I need to be able to save them to my easy access page

    Scenario: try adding to the easy access page
    Given I am logged into my account
    When I click on "Add to Easy Access"
    Then I see "this store was successfully added to your Easy Access page"