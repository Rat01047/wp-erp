//require('dotenv').config();
import { test, expect } from '@playwright/test';


/**
 * 
 * Import Test Pages
 * 
 */
import { LoginPage } from '../pages/00_Basics/login';
import { OverviewPage } from '../pages/01_HRM/overview';








test.describe('TEST :-->', () => {
    //Basic Login
    test('0: Here Admin is logging in to BACK-End', async ({ page }) => {
        const loginPage = new LoginPage(page);
        
        await loginPage.adminLogin();  //TODO: 
    });



    /*
    *
    *
    * Test cases for explore Testing of - HRM and Checking for ERRORS
    * 
    * 
    */

    test('1: Here Admin checks for ERROR in - Overview Page', async ({ page }) => {
        const overviewPage = new OverviewPage(page);
        
        await overviewPage.exploreOverviewPage();  //TODO: 
    });


    

});