Feature: modify my profile
    In order to update my information
    As a buyer
    I need to be able to modify my profile

    Scenario: try adding a card to my payment information
    Given I am logged into my account and have filled out the information for my card
    When I click on "Save"
    Then I see "Payment information successfully updated"

    Scenario: try adding invalid information to my payment methods
    Given I am logged into my account and have filled out the information to add a new payment method
    When I click on "Save"
    Then I see "Invalid credentials. Please double check"