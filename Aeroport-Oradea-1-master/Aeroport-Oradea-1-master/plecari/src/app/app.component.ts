import { Component, OnInit } from '@angular/core';
import { PlecariService } from './services/plecari.service';
import { PlecariClasses } from './Classes/plecari-classes'

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'plecari';
  lstComments:PlecariClasses[];
  currentDate = new Date();

  constructor(private apiPlecari: PlecariService,) {
    setInterval(() => {
      this.currentDate = new Date();
    }, 1);
    
   }

  ngOnInit() {
    this.apiPlecari.getApi()
   .subscribe(
     data => {
       this.lstComments = data;
     }
   ) 
  }
  }

