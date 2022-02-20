Feature: retrieve an order
    In order to retrieve order information
    As a seller
    I need to be able to get the order information

    Scenario: try to retrieve order information
    Given I am logged into my account and have the order id
    When I click on "order detail"
    Then I see "The order information"