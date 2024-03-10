import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-gate2',
  templateUrl: './gate2.component.html',
  styleUrls: ['./gate2.component.css']
})
export class Gate2Component implements OnInit {

  constructor() {
    setInterval(() => {
      this.currentDate = new Date();
    }, 1);
   }

  ngOnInit(): void {
  }
  currentDate = new Date();
}
