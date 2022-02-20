Feature: create my store profile
    In order to built my store profile
    As a seller
    I need to be able to login and create the profile

    Scenario: try creating a profile
    Given I am logged into an account
    When I click on "create"
    Then I see "Profile created successfully"

    Scenario: try creating a profile
    Given I am  not logged into an account
    When I click on "create"
    Then I see "U need to have a account to create a profile"