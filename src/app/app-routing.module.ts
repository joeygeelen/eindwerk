import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AllebierenComponent } from './allebieren/allebieren.component';
import { LoginComponent } from './login/login.component';
import { RegisterComponent } from './register/register.component';
import { AccountComponent } from './account/account.component';
import { AuthGuard } from './auth.guard';
import { CartComponent } from './cart/cart.component';
import { HomeComponent } from './home/home.component';
import { UserService} from './user.service';

const routes: Routes = [
    {path: '', component: HomeComponent},
    {path: 'allebieren', component: AllebierenComponent},
    {path: 'login', component: LoginComponent},
    {path: 'register', component: RegisterComponent},
    {path: 'cart', component: CartComponent},
    {path: 'account', component: AccountComponent, canActivate: [AuthGuard]},
    {path: '',   redirectTo: '/home', pathMatch: 'full' }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
