import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AllebierenComponent } from './allebieren/allebieren.component';
import { ContactComponent } from './contact/contact.component';
import {HomeComponent} from './home/home.component';

const routes: Routes = [
    {path: '', component: HomeComponent},
    {path: 'allebieren', component: AllebierenComponent},
    {path: 'contact', component: ContactComponent},
    {path: '',   redirectTo: '/home', pathMatch: 'full' }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
