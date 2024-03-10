import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { BagajeInternComponent } from './bagaje-intern.component';

describe('BagajeInternComponent', () => {
  let component: BagajeInternComponent;
  let fixture: ComponentFixture<BagajeInternComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ BagajeInternComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(BagajeInternComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
