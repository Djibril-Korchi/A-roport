import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-bagaje-intern',
  templateUrl: './bagaje-intern.component.html',
  styleUrls: ['./bagaje-intern.component.css']
})
export class BagajeInternComponent implements OnInit {
  titlu="Sosiri Inerne - Domestic Flights"

  constructor() {
    setInterval(() => {
      this.currentDate = new Date();
    }, 1);
   }

  ngOnInit(): void {
  }
  currentDate = new Date();
}
