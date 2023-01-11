import type { Page } from '@playwright/test';

import { Login_SelectorsPage } from './login_selectors';

export class LoginPage {
    readonly page: Page;

    constructor(page: Page) {
        this.page = page;
    }

    /*
    *
    *
    * In this page Admin is logging into BACK-END
    * 
    * 
    */

    async adminLogin() {
        await this.page.goto('https://ratul.ajaira.website/wp-admin/');
        
    }



}
