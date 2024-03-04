import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { BagajeExternComponent } from './bagaje-extern.component';

describe('BagajeExternComponent', () => {
  let component: BagajeExternComponent;
  let fixture: ComponentFixture<BagajeExternComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ BagajeExternComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(BagajeExternComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
