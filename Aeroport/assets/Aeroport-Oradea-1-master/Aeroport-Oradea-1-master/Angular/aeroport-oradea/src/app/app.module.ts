import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';

import { AppComponent } from './app.component';
import { PlecariComponent } from './plecari/plecari.component';
import { SosiriComponent } from './sosiri/sosiri.component';
import { BagajeExternComponent } from './bagaje-extern/bagaje-extern.component';
import { BagajeInternComponent } from './bagaje-intern/bagaje-intern.component';
import { CheckInComponent } from './check-in/check-in.component';
import { GateComponent } from './gate/gate.component';
import { NavbarComponent } from './navbar/navbar.component';
import { FooterComponent } from './footer/footer.component';
import { HeaderTabeleComponent } from './header-tabele/header-tabele.component';
import { AeroportService } from '../app/services/aeroport.service';
import { CheckIn2Component } from './check-in2/check-in2.component';
import { CheckIn3Component } from './check-in3/check-in3.component';
import { CheckIn4Component } from './check-in4/check-in4.component';
import { Gate2Component } from './gate2/gate2.component';
import { Gate3Component } from './gate3/gate3.component';


@NgModule({
  declarations: [
    AppComponent,
    PlecariComponent,
    SosiriComponent,
    BagajeExternComponent,
    BagajeInternComponent,
    CheckInComponent,
    GateComponent,
    NavbarComponent,
    FooterComponent,
    HeaderTabeleComponent,
    CheckIn2Component,
    CheckIn3Component,
    CheckIn4Component,
    Gate2Component,
    Gate3Component
  ],
  imports: [
    BrowserModule,
    HttpClientModule
  ],
  providers: [AeroportService],
  bootstrap: [AppComponent]
})
export class AppModule {  }
