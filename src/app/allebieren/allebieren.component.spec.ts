import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AllebierenComponent } from './allebieren.component';

describe('AllebierenComponent', () => {
  let component: AllebierenComponent;
  let fixture: ComponentFixture<AllebierenComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AllebierenComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AllebierenComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
