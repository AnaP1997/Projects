import { NgModule } from '@angular/core';

import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { ConverterComponent } from './converter/converter.component';
import { ContactComponent } from './contact/contact.component';
import { NotFoundComponent } from './not-found/not-found.component';


const routes: Routes = [
  {path:'',component:HomeComponent},
  {path:'home',redirectTo:'/',pathMatch:'full'},
  {path:'convert',component:ConverterComponent},
  {path:'contact',component:ContactComponent},
  {path:"**",component:NotFoundComponent}

];

@NgModule({
  imports: [RouterModule.forRoot(routes),
    ],
  
  exports: [RouterModule]
})
export class AppRoutingModule { }
