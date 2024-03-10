import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})


export class AppComponent {
  title = 'aeroport-oradea';
  selection = 'plecari';
  displayDate: {newDate: string, year: number, month: number, day: number};

  pageSelected(pageWasSelected: string) {
    this.selection = pageWasSelected;
  }

}

