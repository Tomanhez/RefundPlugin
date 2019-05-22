@managing_administrators
Feature: Viewing last administrator login date
    In order to improve security and control administrator
    As an Administrator
    I want to be able to see last logged date all administrators

    Background:
        Given there is an administrator "donald@gov.us.com"
        And there is also an administrator "obama@gov.us.com"
        And administrator "donald@gov.us.com" has logged in "2018-06-25 16:24"
        And administrator "obama@gov.us.com" has logged in "2019-05-21 08:24"
        And I am logged in as an administrator

    @ui
    Scenario: Viewing last login date of all administrator
        When I browse administrators page
        And I should see that administrator "donald@gov.us.com" has logged in "2018-06-25 16:24"
        And I should see that administrator "obama@gov.us.com" has logged in "2019-05-21 08:24"
