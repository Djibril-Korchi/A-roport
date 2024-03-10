import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CheckIn3Component } from './check-in3.component';

describe('CheckIn3Component', () => {
  let component: CheckIn3Component;
  let fixture: ComponentFixture<CheckIn3Component>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CheckIn3Component ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CheckIn3Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
