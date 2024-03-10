import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { SosiriComponent } from './sosiri.component';

describe('SosiriComponent', () => {
  let component: SosiriComponent;
  let fixture: ComponentFixture<SosiriComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SosiriComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SosiriComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
