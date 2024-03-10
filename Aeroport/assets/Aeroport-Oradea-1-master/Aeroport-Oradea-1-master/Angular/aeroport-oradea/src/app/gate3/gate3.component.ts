import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-gate3',
  templateUrl: './gate3.component.html',
  styleUrls: ['./gate3.component.css']
})
export class Gate3Component implements OnInit {

  constructor() {
    setInterval(() => {
      this.currentDate = new Date();
    }, 1);
   }

  ngOnInit(): void {
  }
  currentDate = new Date();
}
