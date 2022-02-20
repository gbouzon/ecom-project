Feature: process a transaction
    In order to process a transaction
    As a seller
    I need to be able to process the transaction

    Scenario: try to process with the correct bank information
    Given  I am logged into my account and have filled with the correct banking information
    When I click on "process transaction"
    Then I see "Transaction success"

    Scenario: try to process with the incorrect bank information
    Given  I am logged into my account and have filled with the incorrect banking information
    When I click on "process transaction"
    Then I see "Invalid credentials. Please double check"