import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-bagaje-extern',
  templateUrl: './bagaje-extern.component.html',
  styleUrls: ['./bagaje-extern.component.css']
})
export class BagajeExternComponent implements OnInit {
  titlu="Sosiri Externe - Inernational Flights"


  constructor() {
    setInterval(() => {
      this.currentDate = new Date();
    }, 1);
   }

  ngOnInit(): void {
  }
  currentDate = new Date();
}
