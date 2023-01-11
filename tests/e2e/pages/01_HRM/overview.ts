import type { Page } from '@playwright/test';
//import { isVisible } from '../framework/common-actions';

import { HRM_SelectorsPage } from './hrm_selectors';

export class OverviewPage {
    readonly page: Page;

    constructor(page: Page) {
        this.page = page;
    }

    /*
    *
    *
    * In this page we look for any form of ERRORS - Such as: Fatal Error, PHP Warning, Console Error
    * 
    * 
    */

    async exploreOverviewPage() {
        await this.page.goto('https://ratul.ajaira.website/wp-admin/');
    }



}
